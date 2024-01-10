<?= $this->extend('private_layout')?>
<?= $this->section('content')?>

<?= $this->include("dashboard/sidebar")?>

<div class="container section">

    <h2 class="text-center">Registered Users</h2>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-body" style="text-align:center;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>

                        <tr>
                            <td>
                                <?= $user['username']?>
                            </td>
                            <td>
                                <?= $user['email']?>
                            </td>

                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>




<!--bootstrap links-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!--owl slider link-->


<?= $this->endSection() ?>