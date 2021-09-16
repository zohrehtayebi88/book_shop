<?php

declare (strict_types=1);
require 'inc/tools.inc.php';

$header = array('Artikel.N', 'Artikel', 'menge', 'Einzelpreis', 'Gesamtepreis', 'Mehrwertsteuer');
$id = intval($_SESSION['user_id']);
$total = 0;
if(isset($_GET['shop_n']))
        $shop_n = $_GET['shop_n'];
        else $shop_n = $_SESSION['shop_n'];


$user = new User();
$userDao = new UserDao();
$shop = new Shop();
$shopDao = new ShopDao();
$user = $userDao->readOne($id);
$shops = $shopDao->read_Invoice($shop_n);

$user_d = [$user->getName(),
    $user->getN_name(),
    $user->getStrasse(),
    $user->getPlz(),
    $user->getLand(),
];

foreach ($shops as $shop) {
    $gp = new Artikel($shop->getProduct_id(), $shop->getProduct_preis(), $shop->getQuantity());
    $gp = $gp->sum();
    $data[] = [$shop->getProduct_id(),
        $shop->getProduct_name(),
        $shop->getQuantity(),
        $shop->getProduct_preis(),
        $gp,
        '7%',
    ];
    $total += $gp;
}

$summe = number_format($total, 2, ",", ".");
$shop = [$shop_n, $shops[0]->getDatum()];
$pdf = new PDF();
$pdf->AddPage();
$pdf->Adress($user_d, $shop);
$pdf->Table($header, $data, $summe);
$pdf->Output();
?>