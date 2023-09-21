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
                <th scope="col">Date de retour</th>
                <th scope="col">En cours?</th>
                <th scope="col">Résa archivé?</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
      <?php  foreach (Reservation::getAllReservations() as $resa):?>
            <tr>
                <td><a href="/reservation.php?id=<?=$resa['id']?>" class="btn btn-sm btn-outline-light"><?=$resa['id']?></a></td>
                <td><?=$resa['title']?>-<?=$resa['author']?></td>
                <td><?=$resa['firstname']?> - <?=$resa['lastname']?></td>
                <td><?= (DateTime::createFromFormat('Y-m-d', $resa['date_start']))->format('d/m/Y'); ?></td>
                <td><?= (DateTime::createFromFormat('Y-m-d', $resa['date_end']))->format('d/m/Y'); ?></td>
               <?php if(!empty($resa['date_return'])): ?>
                <td><?=(DateTime::createFromFormat('Y-m-d', $resa['date_return']))->format('d/m/Y'); ?></td>
                <?php else: ?>
                    <td><?=''?></td>
                <?php endif ?>
                <td><?=$resa['isClosed']?></td>
                <td><?=$resa['isArchived']?></td>
                <td>
                    <?php if(!$resa['isClosed']):?>
                    <a href="/reservations.php?idResa=<?=$resa['id']?>" class="btn btn-sm btn-warning">Rendre</a>
                    <?php endif ?>
                </td>
            
                </tr>
            
                <?php endforeach ?>
        </tbody>
    </table>
