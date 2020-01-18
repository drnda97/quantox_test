<?php $i = 1; ?>
<?php if(!isset($_SESSION['user'])): ?>
    <?php header('Location: /user/login?err=Please Login') ?>
<?php else: ?>
    <main class="result-main">
        <h1>Users with similar name or username with your search</h1>  
        <table border="1" cellpadding="15" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(View::$data as $information): ?>
                <tr>
                    <td><?php echo $i++; ?></td>    
                    <td><?php echo $information['email']; ?></td>    
                    <td><?php echo $information['name']; ?></td>    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
<?php endif; ?>
