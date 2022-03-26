<?php

include_once 'header.php';
include_once '../src/model/dataclass.php';
include_once '../src/model/datacontext.php';

if(!isset($db)) {
    $db = new datacontext();
}

$coords = [];
?>


<body>
<title>Highway Data</title>
<div class="contenta">
    <div class="row">
        <div class="col-sm-12">
            <h1>Data</h1>
            <p>This page includes a table with Highway damages
                <br>in Plymouth since April 2017 to July 2017. Data is presented</br>
                as Human-Readable on this page.
            </p>

            <p2><b><a href="#info">view the statistics of highway incidents</a></b></p2>
        </div>
    </div>
</div>

<a id="info">
<div class="container">
    <div class="rowa">
        <div class="ttables">
            <table class="tables">
                <thead class="title">
                <tr>
                    <th>Postcode</th>
                    <th>Incident Date</th>
                    <th>Street Name</th>
                    <th>Issue Reported</th>
                    <th>Sub Category</th>
                </tr>
                </thead>
                <tbody class="border">
                <?php
                $HTML = "";
                $highway = $db->data_class();
                if($highway)
                {
                    foreach($highway as $meadow)
                    {
                        $HTML .= "<tr>";
                        $HTML .= "<td>".$meadow->Postcode()."</td>";
                        $HTML .= "<td>".$meadow->Dateincident()."</td>";
                        $HTML .= "<td>".$meadow->Streetname()."</td>";
                        $HTML .= "<td>".$meadow->Issuereported()."</td>";
                        $HTML .= "<td>".$meadow->Subcat()."</td>";
                        $HTML .= "</tr>";
                    }
                }
                echo $HTML;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<?php include_once 'footer.php'; ?>