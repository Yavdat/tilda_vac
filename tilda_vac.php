<?php

// задание 1
// Нужно вывести лесенкой числа от 1 до 100.
// 1
// 2 3
// 4 5 6
// ...

$curPos = 1; // текущая позиция в строке
$LineSize = 1; // перевод строки

for ( $i=1; $i<=100; $i++) {
    if ($LineSize==$curPos) {
        echo "{$i}\n";
        $LineSize++; // увеличили размер след. строки
        $curPos = 1;
    } else {
        echo "{$i} ";
        $curPos++;
    }
}
echo "\n\n\n";

// задание 2
/*
Нужно заполнить массив 5 на 7 случайными уникальными числами от 1 до 1000.
Вывести получившийся массив и суммы по строкам и по столбцам.
 */
$sizeX = 5;
$sizeY = 7;
$curPosX = 0;
$curPosY = 0;
$arr = []; // одномерный массив для хранения уникальных чисел
$arr5x7 = []; // двумерный массив 5х7

// заполняем двумерный массив 5х7 за один проход в цикле
for ( $i=0; $i < $sizeX*$sizeY; $i++) {

    $rand = random_int(1, 1000);
    // если такое число уже существует
    if (in_array($rand, $arr)) {
        // тогда подбираем новое
        while (true) {
            $rand = random_int(1, 1000);
            if (!in_array($rand, $arr)) {
                break;
            }
        }
    }
    $arr[] = $rand;

    if ((($i+1) % $sizeX) == 0) {
        // echo "{$arr[$i]}\n";
        $arr5x7[$curPosX][$curPosY % $sizeY] = $arr[$i];
        $curPosX = 0;
        $curPosY++;
    } else {
        // echo "{$arr[$i]} ";
        $arr5x7[$curPosX][$curPosY % $sizeY] = $arr[$i];
        $curPosX++;
    }
    
}
echo "\n";



$column_sum = array_fill(0, $sizeX, 0); // для вычисления суммы в каждой колонке
$row_sum = array_fill(0, $sizeY, 0); // для вычисления суммы в каждой строке 


for ($y=0; $y < $sizeY; $y++) {
    for ($x=0; $x < $sizeX; $x++) {
        $column_sum[$x] += $arr5x7[$x][$y]; // собираем сумму в каждой колонке
        $row_sum[$y] += $arr5x7[$x][$y]; // собираем сумму в каждой строке
        echo $arr5x7[$x][$y] . " ";
    }
    echo "  << Сумма в строке: {$row_sum[$y]}   \n";
}
echo "-----------------------\n";
echo "Сумма в каждой колонке:\n";
for ($i=0; $i<$sizeX; $i++) {
    echo $column_sum[$i] . " ";
}
echo "\n";
die();

// Задание 3
// По этой задаче идея такова: есть определенный массив городов, где в каждом городе есть наш определенный номер.(!но не во всех городах) 
// Мы с помощью JS-библиотеки яндекса(ниже приведен пример) определяем локацию и город и далее будем искать это город в нашем массиве городов и выдавать нужный номер телефона, 
// если данного города нет, то выдаем дефолтный, то есть номер по умолчанию.   

echo "<script src=\"http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU\" type=\"text/javascript\">ymaps.ready(function(){

    console.log(ymaps.geolocation);

});
ymaps.ready(function(){

    var geo = ymaps.geolocation;

    $('.city').html(geo.city);
});
</script>"
