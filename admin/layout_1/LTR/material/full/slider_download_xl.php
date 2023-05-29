<?php include_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'config.php');?>
<?php
$sliderInJson = file_get_contents($dataResources . 'slider.json');
$sliders = json_decode($sliderInJson);


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Add data to the spreadsheet
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', '#');
$sheet->setCellValue('B1', 'Tittle');
$sheet->setCellValue('C1', 'Caption');
$sheet->setCellValue('D1', 'Image');



foreach ($sliders as $key=> $slider) {
    $fieldValue = 2+$key;
    $sheet->setCellValue('A'.$fieldValue, ++$key);
    $sheet->setCellValue('B'.$fieldValue, $slider->tittle);
    $sheet->setCellValue('C'.$fieldValue, $slider->caption);

    // // Add image
    // $imagePath = $uploads.$slider->src;
    // $drawing = new Drawing();
    // $drawing->setName('Image');
    // $drawing->setDescription('Image');
    // $drawing->setPath($imagePath);
    // $drawing->setCoordinates('D' . $fieldValue);
    // $drawing->setHeight(30);
    // $drawing->setWidth(40);
    // $drawing->setWorksheet($sheet);
    
}


// Set appropriate headers
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="example.xlsx"');
header('Cache-Control: max-age=0');

// Save the Excel file and output it to the browser
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');