<form method="GET" action="home.php">
    <div class='col-sm-3'>
        <label for="searchList">Choose:</label>
        <select name="searchList">
            <option value="name">Name</option>
            <option value="ram">RAM</option>
        </select>
    </div>
    <div class='col-sm-4'>
        <input type="text" name="search" placeholder="Search" class="form-control" >
    </div>
    <div class='col-sm-1'>
        <input type="hidden"><button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Search VM's"><strong>Search</strong></button>
    </div>
</form>
<?php

$searchList = $_REQUEST['searchList'];
$search = $_REQUEST['search'];

require_once 'connection.php';

if ($searchList == "name") {
    if (isset($search) && !empty($search)) {
        $stmt = $pdo->prepare("SELECT * FROM machine WHERE name LIKE :search");
        $parameters = ['search' => "%" . $search . "%"];
    } else {
        $stmt = $pdo->prepare("SELECT * FROM machine");
        $parameters = [];
    }

} elseif ($searchList == "ram") {
    if (isset($search) && !empty($search)) {
        $stmt = $pdo->prepare("SELECT * FROM machine WHERE ram LIKE :search");
        $parameters = ['search' => $search ];
    } else {
        $stmt = $pdo->prepare("SELECT * FROM machine");
        $parameters = [];
    }

} else  {
        $stmt = $pdo->prepare("SELECT * FROM machine");
        $parameters = [];

}

$stmt->execute($parameters);
$machines = $stmt->fetchAll();
?>

