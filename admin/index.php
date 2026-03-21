<?php
$conn = new mysqli("localhost","root","","movie_hunter");
$sql = "
INSERT INTO countries (ru_name,en_name) 
VALUES 
('Индия','India'),
('Китай','China'),
('Соединенные Штаты','United States'),
('Индонезия','Indonesia'),
('Пакистан','Pakistan'),
('Нигерия','Nigeria'),
('Бразилия','Brazil'),
('Бангладеш','Bangladesh'),
('Россия','Russia'),
('Эфиопия','Ethiopia'),
('Мексика','Mexico'),
('Япония','Japan'),
('Египет','Egypt'),
('Филиппины','Philippines'),
('Демократическая Республика Конго','DR Congo'),
('Вьетнам','Vietnam'),
('Иран','Iran'),
('Турция','Turkey'),
('Германия','Germany'),
('Танзания','Tanzania'),
('Таиланд','Thailand'),
('Соединенное Королевство','United Kingdom'),
('Франция','France'),
('Южно-Африканская Республика','South Africa'),
('Италия','Italy'),
('Кения','Kenya'),
('Мьянма','Myanmar'),
('Колумбия','Colombia'),
('Судан','Sudan'),
('Уганда','Uganda'),
('Южная Корея','South Korea'),
('Алжир','Algeria'),
('Ирак','Iraq'),
('Испания','Spain'),
('Аргентина','Argentina'),
('Афганистан','Afghanistan'),
('Йемен','Yemen'),
('Канада','Canada'),
('Ангола','Angola'),
('Украина','Ukraine'),
('Марокко','Morocco'),
('Польша','Poland'),
('Узбекистан','Uzbekistan'),
('Мозамбик','Mozambique'),
('Малайзия','Malaysia'),
('Гана','Ghana'),
('Саудовская Аравия','Saudi Arabia'),
('Перу','Peru'),
('Мадагаскар','Madagascar'),
('Кот-д\'Ивуар','Côte d\'Ivoire');";

if($conn->connect_error){
  die("conect failed");
}
echo("conect ok");
$conn->close();

?>