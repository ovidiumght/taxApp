<?php
setlocale(LC_MONETARY, 'en_US');
?>
<h1>Overall Tax Collected per State</h1>
<?php foreach($overAllTaxCollectedPerState as $state => $taxCollected) {
   ?>
    <strong><?php echo $state;?></strong> $ <?php echo number_format($taxCollected); ?><br/>
    <?php
}?>

<h1>Average Tax Collected per State</h1>
<?php foreach($averageTaxCollectedPerState as $state => $taxCollected) {
   ?>
    <strong><?php echo $state;?></strong> $ <?php echo number_format($taxCollected); ?><br/>
    <?php
}?>

<h1>Average County Tax Rate per State</h1>
<?php foreach($averageCountyTaxRatePerState as $state => $averageCountyTax) {
    ?>
    <strong><?php echo $state;?></strong> $ <?php echo $averageCountyTax; ?><br/>
    <?php
}?>

<h1>Average Country tax Rate</h1>
<?php echo $averageCountryTaxRate; ?>

<h1>All tax collected in the country</h1>
$ <?php echo number_format($allTaxesCollected,2); ?>
