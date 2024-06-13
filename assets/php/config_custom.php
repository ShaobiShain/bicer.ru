<?php
<form action="order.php" method="post" enctype="multipart/form-data">
<!-- ваши поля формы -->
<button type="submit">Отправить заказ</button>
</form>

// Получаем данные из формы
\$engine_volume = \$_POST['engine-volume'];
\$color = \$_POST['color'];
\$handlebar = \$_POST['handlebar'];
\$transmission = \$_POST['transmission'];
\$wheel_size = \$_POST['wheel-size'];
\$exhaust = \$_POST['exhaust'];
\$brakes = \$_POST['brakes'];
\$suspension = \$_POST['suspension'];
\$seat = \$_POST['seat'];
\$luggage_rack = \$_POST['luggage-rack'];
\$additional_equipment = \$_POST['additional-equipment'];
\$concept_drawings = \$_FILES['concept-drawings'];

// Создаем текстовый файл для сохранения данных
\$file = fopen('order_data.txt', 'w');

// Записываем данные в текстовый файл
fwrite(\$file, 'Engine volume: ' . \$engine_volume . "\n");
fwrite(\$file, 'Color: ' . \$color . "\n");
fwrite(\$file, 'Handlebar: ' . \$handlebar . "\n");
fwrite(\$file, 'Transmission: ' . \$transmission . "\n");
fwrite(\$file, 'Wheel size: ' . \$wheel_size . "\n");
fwrite(\$file, 'Exhaust: ' . \$exhaust . "\n");
fwrite(\$file, 'Brakes: ' . \$brakes . "\n");
fwrite(\$file, 'Suspension: ' . \$suspension . "\n");
fwrite(\$file, 'Seat: ' . \$seat . "\n");
fwrite(\$file, 'Luggage rack: ' . \$luggage_rack . "\n");
fwrite(\$file, 'Additional equipment: ' . \$additional_equipment . "\n");

// Сохраняем выбранные файлы на сервере
if (\$concept_drawings['error'] === UPLOAD_ERR_OK) {
    move_uploaded_file(\$concept_drawings['tmp_name'], 'uploads/' . \$concept_drawings['name']);

    // Записываем путь к файлу в текстовый файл
    fwrite(\$file, 'Concept drawings: uploads/' . \$concept_drawings['name'] . "\n");
}
