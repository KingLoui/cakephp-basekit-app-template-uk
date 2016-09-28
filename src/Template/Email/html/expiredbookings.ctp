<h3>Folgende Accountbuchungen sind abgelaufen:</h3><br />

<table border="0" cellpadding="0" cellspacing="0">
	<thead style="font-weight:bold;">
			<tr>
				<td>Benutzer</td>
				<td>Ablaufdatum</td>
				<td>Lynda.com Account</td>
			</tr>
	</thead>
  <tbody>
  	<?php foreach ($bookings as $booking): ?>
  		<tr>
    		<td><?= $booking['user']['uniaccount'] ?></td>
				<td><?= $booking['expirationdate'] ?></td>
				<td><?= $booking['account']['username'] ?></td>
			</tr>
		<?php endforeach; ?>
  </tbody>
</table>
<br /><br />
<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
  <tbody>
    <tr>
      <td align="left">
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td> 
              	<?= $this->Html->link(__('Show expired bookings'), [
              			'prefix' => 'admin',
								    'controller' => 'Bookings',
								    'action' => 'expired',
								    'target' => '_blank',
								     '_full' => true
								]); ?>	 
							</td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>