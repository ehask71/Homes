<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date Registered</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($data) > 0) {
                    foreach ($data AS $user) {
                        ?>
                <tr>
                    <td><?php echo $user['Account']['firstname'].' '.$user['Account']['lastname'];?></td>
                    <td><?php echo $user['Account']['created'];?></td>
                    <td><?php echo ucfirst($user['Account']['is_active']);?></td>
                    <td></td>
                </tr>
                        <?php
                    }
                } else {
                ?>
                <tr>
                    <td colspan="100">No Accounts To Display</td>
                </tr>
                <?
                }
                ?>
            </tbody>
        </table>
        <?php echo $this->Paginator->pagination(array(
            'div' => 'pagination pagination-centered'
        )); ?>
    </div>
</div>