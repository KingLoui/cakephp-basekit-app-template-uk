<?php if($hasAccount): ?>
		<h4>Accountdetails</h4>
		<p>
			<table border="0">
				<tr><td><strong>Benutzername:&nbsp;&nbsp;&nbsp;</strong></td><td><?= $account['username'] ?></td></tr>
				<tr><td><strong>Passwort:</strong></td><td><?= $account['password'] ?></td></tr>
			</table>
			<br />
			Unter folgendem Link können Sie sich mit ihrem Account anmelden:
			<a href="https://www.lynda.com/signin" target="_blank">Anmeldung</a><br />
			<br />
			Ihr Account ist noch bis zum  <?= $book['expirationdate'] ?> Uhr gültig.
		</p>
		<?= $this->Html->link('Account zurückgeben', ['controller' => 'bookings', 'action' => 'delete'],['class' => 'button']) ?>
<?php elseif($freeAccounts): ?>
		<h4>Zugang zu Videotutorials</h4>
		<p>Ich möchte einen Zugangsantrag für die Videotutorialplattform lynda.com für vier Wochen ausleihen. Ich habe die <?= $this->Html->link('Nutzungsordnung dieses Dienstes', 'http://www.uni-kassel.de/go/vt-sla', ['target' => '_blank']) ?> gelesen und akzeptiere die darin aufgeführten Rahmenbedingungen.
		</p>
		<?= $this->Html->link('Account ausleihen', ['controller' => 'bookings', 'action' => 'add'],['class' => 'button']) ?>
<?php elseif($isWaiting): ?>
		<p>Ihr Wartelistenplatz: <?= $reservationPlace ?></p>
		<?= $this->Html->link('Aus Warteliste austragen', ['controller' => 'reservations', 'action' => 'delete'],['class' => 'button']) ?>
<?php else: ?>
		<p>
			Zur Zeit sind leider alle unsere Lynda.com Accounts ausgebucht, damit Sie eine faire Chance auf einen Account bekommen, können Sie sich in unsere Warteliste eintragen. Sobald Sie an der Reihe sind, werden Sie per E-Mail benachrichtigt.
		</p>
		<h4>Wartelistenlänge: <?= $numReservation ?></h4>
		<?= $this->Html->link('In Warteliste eintragen', ['controller' => 'reservations', 'action' => 'add'],['class' => 'button']) ?>
<?php endif; ?>
