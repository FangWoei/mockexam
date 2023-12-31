<?php

    // redirect to home page if user is not admin
    if ( !isCurrentUserAdmin() ) {
        header( 'Location: /' );
        exit;
    }

    require 'parts/header.php';
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Add New Question</h1>
    </div>
    <div class="card mb-2 p-4">
        <?php require dirname(__DIR__) .  '/parts/message_error.php'; ?>
        <form method="POST" action="questions/add">
            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <textarea class="form-control" id="question" name="question" rows="5"></textarea>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
    <div class="text-center">
        <a href="/manage-questions" class="btn btn-link link-secondary btn-sm"><i class="bi bi-arrow-left"></i> Back to Manage Questions</a>
    </div>
</div>
<?php
    
    require 'parts/footer.php';