<?php
 require_once 'classes/Reservation.php';

 ?>
<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Voir</th>
                <th scope="col">Livre</th>
                <th scope="col">Client</th>
                <th scope="col">Début</th>
                <th scope="col">Fin</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
      <?php  foreach (Reservation::getCurrentReservation() as $resa):?>
            <tr>
                <td><a href="/reservation.php?id=<?=$resa['id']?>" class="btn btn-sm btn-outline-light"><?=$resa['id']?></a></td>
                <td><?=$resa['title']?></td>
                <td><?=$resa['firstname']?> - <?=$resa['lastname']?></td>
                <td><?= (DateTime::createFromFormat('Y-m-d', $resa['date_start']))->format('d/m/Y'); ?></td>
                <td><?= (DateTime::createFromFormat('Y-m-d', $resa['date_end']))->format('d/m/Y'); ?></td>
                <td><a href="#" class="btn btn-sm btn-warning">Rendre</a></td>
            </tr>
            
            <?php endforeach ?>
        </tbody>
    </table>
