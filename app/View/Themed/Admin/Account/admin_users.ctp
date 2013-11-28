<?php $this->Html->addCrumb('Members', '/admin/account/users');?>
<div class="row-fluid">
    <div class="box span12">
        <div class="box-header">Members</div>
            <div class="box-content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('lastname', 'Name');?></th>
                            <th><?php echo $this->Paginator->sort('created', 'Date Registered');?></th>
                            <th><?php echo $this->Paginator->sort('is_active', 'Status');?></th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($data) > 0) {
                            foreach ($data AS $user) {
                                ?>
                                <tr>
                                    <td><?php echo $user['Account']['firstname'] . ' ' . $user['Account']['lastname']; ?></td>
                                    <td><?php echo $user['Account']['created']; ?></td>
                                    <td><?php echo ucfirst($user['Account']['is_active']); ?></td>
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
                <?php
                echo $this->Paginator->pagination(array(
                    'div' => 'pagination pagination-centered'
                ));
                ?>
        </div>
    </div>
</div>