<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Favorit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Aplikasi Saya</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Daftar Favorit Anda</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <?php if(count($favorites) == 0): ?>
            <div class="alert alert-info">
                Tidak ada item yang difavoritkan.
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach($favorites as $item): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="<?= asset('storage/'.$item->image) ?>" class="card-img-top" alt="<?= $item->name ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item->name ?></h5>
                                <p class="card-text"><?= Str::limit($item->description, 100) ?></p>
                                <a href="#" class="btn btn-danger btn-sm">Hapus dari Favorit</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>