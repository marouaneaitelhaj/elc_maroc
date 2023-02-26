<div class="d-flex justify-content-center">

<table class="table m-4 w-75">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">description</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['read'] as $read) {
        ?>
            <tr>
                <td><?= $read["nom"] ?></td>
                <td><?= substr($read["description"], 0, 30) ?></td>
                <td>
                    <a href="./DeleteCat?id=<?= $read['IdCat'] ?>">
                        <button class="btn">Delete</button>
                    </a>
                    <a href="./editCat?id=<?= $read['IdCat'] ?>">
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
                    <a href="./visibilitycat?id=<?= $read['IdCat'] ?>&vis=<?= $vis ?>">
                        <button class="btn">to <?= $vis ?></button>
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