<?php
include './config/connection.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="shortcut icon" href="./assets/img/MoozLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/custom.css?v=1.1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <title>Mooz</title>
</head>

<body class="d-flex flex-column gap-4">
    <div class="img vw-100">
        <div>
            <?php include 'navbar.php' ?>
        </div>
        <div class="content m-5 p-5 rounded-4 bg-body-tertiary">
            <div class="d-flex flex-column gap-5 justify-content-center align-items-center">
                <h1 class="fw-bolder border-bottom" style="color: #0077B6;">USER DATA</h1>
                <?php
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $per_page = 5;
                $offset = ($page - 1) * $per_page;
                $get = $connection->query("SELECT * FROM users LIMIT $per_page OFFSET $offset");
                $total_data = $connection->query("SELECT COUNT(*) as total FROM users")->fetch_assoc()['total'];
                $total_pages = ceil($total_data / $per_page);
                ?>
                <table class="slide-in-bottom table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = ($page - 1) * $per_page + 1;
                        while ($data = $get->fetch_assoc()) :
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data["users_name"]; ?></td>
                                <td>
                                    <img src="./images/<?= $data["users_img"]; ?>" width="100">
                                </td>
                                <td>
                                    <a href="updateusers.php?id=<?= $data['id_users']; ?>" class="btn btn-warning fw-bolder">CHANGE</a>
                                    <a href="deleteusers.php?id=<?= $data['id_users']; ?>" class="btn btn-danger fw-bolder">DELETE USER</a>
                                    <a href="deleteimages.php?id=<?= $data['id_users']; ?>" class="btn btn-danger fw-bolder">DELETE IMAGES</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <a href="addusers.php" class="gradient-custom-2 border-0 fw-bolder btn btn-primary">
                    <h2 class="m-0 px-4">Add Users</h2>
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>