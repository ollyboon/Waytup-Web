<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->room_number]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->room_number], ['confirm' => __('Are you sure you want to delete # {0}?', $room->room_number)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->room_number) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Room Number') ?></th>
            <td><?= h($room->room_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room Name') ?></th>
            <td><?= h($room->room_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($room->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($room->longitude) ?></td>
        </tr>
    </table>
</div>
