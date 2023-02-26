<div class="d-flex justify-content-center">
<table class="table m-4 w-75">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">description</th>
            <th scope="col">price</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['read'] as $read) {
        ?>
            <tr>
                <td><?= substr($read["libelle"], 0, 20) ?></td>
                <td><?= substr($read["description"], 0, 20) ?></td>
                <td><?= $read["prixfinal"] ?>$</td>
                <td>
                    <a href="./Delete?id=<?= $read['IdPrd'] ?>">
                        <button class="btn">Delete</button>
                    </a>
                    <a href="./editproduct?id=<?= $read['IdPrd'] ?>">
                        <button class="btn">Edit</button>
                    </a>
                    <?php
                    $vis = '';
                    if ($read['visibility'] == 'public') {
                        $vis = 'private';
                    } else {
                        $vis = 'public';
                    }
                    ?>
                    <a href="./visibility?id=<?= $read['IdPrd'] ?>&vis=<?=$vis?>">
                        <button class="btn">change make this <?=$vis?></button>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<style>
    td {
        text-align: center;
    }
    th {
        text-align: center;
    }
</style>
</div>