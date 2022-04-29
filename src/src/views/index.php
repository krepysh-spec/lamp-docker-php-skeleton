<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lamp Docker PHP skeleton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="px-4 bg-dark text-secondary py-5 text-center">
    <h1 class="display-5 fw-bold text-white">Lamp Docker PHP skeleton</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Stop installing the entire development stack on your local machine. This project will allow you to quickly start working with php. To install, you need to install docker locally.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="https://github.com/krepysh-spec/lamp-docker-php-skeleton" target="_blank" class="btn btn-default btn-lg px-4 gap-3">View on GitHub</a>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">PHP info</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">XDebug info</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Mysql</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="redis-tab" data-bs-toggle="tab" data-bs-target="#redis" type="button" role="tab" aria-controls="redis" aria-selected="false">Redis</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <?php phpinfo() ?>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <?php xdebug_info() ?>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Mysql</div>
                                Content to database:
                            </div>
                            <span class="badge bg-primary rounded-pill"><?= $databaseConnectionStatus ? 'Success': 'Error' ?></span>
                        </li>
                    </ol>
                </div>
                <div class="tab-pane fade" id="redis" role="tabpanel" aria-labelledby="redis-tab">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Redis</div>
                                Connect to redis:
                            </div>
                            <span class="badge bg-primary rounded-pill"><?= $redisConnectionStatus ? 'Success': 'Error' ?></span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
