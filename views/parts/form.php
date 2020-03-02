<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group mt-5">
        <label for="post_date">Дата публикации:
            <?= date("d : m : Y") ?>
        </label>
    </div>
    <div class="form-group mt-5">
        <label for="title" class="mb-3">Название:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?=$post->title?>" required>
    </div>
    <div class="form-group">
        <label for="description" class="mb-3">Введите текст: </label>
        <textarea class="form-control" id="description" name="description" id="description" rows="10" cols="50"  required>
            <?=$post->description?>
            </textarea>
    </div>
    <div>
        <input type="file" name="Photo" value="Download" class="mt-3">
    </div>

    <button type="submit" name="btnInsertPost" class="btn btn-primary">
        <?=$btnText?></button>
    <div class="form-group">
        <img src="<?=$post->Photo ? 'Photo/'.$post->Photo:''?>" alt="" class="img">
    </div>
</form>