<form action="" method="post" enctype="multipart/form-data" >   
    <div class="row"> 
    <div class="col-md-12">
        <div class="box" style="float:left;">
            <header>
                <div class="icons"><i class="ion ion-compose"></i></div>
                <div class="col-md-6"> 
                    <?php foreach (Rdir(VENDOR.'/lib/lang') as $key => $lang) { ?>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapseT<?php echo $key;?>" class="btn btn-default btn-sm accordion-toggle minimize-box" ><?php echo strtoupper($lang);?></a>
                    <?php } ?> 
                </div>
                <div class="col-md-4"><input type="text" placeholder="Slug Post" id="autoslug" name="slug" class="form-control" <?php if($_SESSION['User']->role != "2"){echo 'disabled="disabled"';} ?> value="<?php echo postdata($datapost)->slug; ?>"></div>
                <div class="col-md-1 toolbar" > 
                    <div class="make-switch" data-on="success" data-off="danger">
                        <input type="checkbox" name="online" class="success" <?php if($datapost->online == "1"){ echo "checked";}?> <?php if($_SESSION['User']->role != "2"){echo 'disabled="disabled"';} ?>>
                    </div>
                </div>
            </header>
            <div class="body"> 
                <div class="col-md-8 panel-group" id="accordion1">
                    <div class="panel panel-default">
                    <?php foreach (Rdir(VENDOR.'/lib/lang') as $key => $lang) { ?>
                        <div id="collapseT<?php echo $key;?>" class="panel-collapse collapse <?php if($lang == $_SESSION['Lang']){ echo "in";} ?>">
                            <div class="panel-body">
                                <input type="text" placeholder="Title Post" maxlength="40" id="title<?php echo $lang;?>" oninput="autoSlug(this.value)"  name="title_<?php echo $lang;?>" class="form-control" value="<?php echo postdata($datapost)->alltitle[$lang];?>"> 
                                <textarea name="description_<?php echo $lang;?>" placeholder="Description Post" class="form-control" style="height:115px;resize: none;" maxlength="300"><?php echo postdata($datapost)->alldescription[$lang];?></textarea>
                                <hr>
                                <textarea name="content_<?php echo $lang;?>" placeholder="Content Post" class="TinyMCEEdit" style="min-height:500px;width:100%;"><?php echo postdata($datapost)->allcontent[$lang];?></textarea>
                            </div>
                        </div>
                    <?php } ?>
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo $datapost->img;?>" alt="" /></div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                <input type="file" name="file" value="<?php echo $datapost->img;?>"/></span>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div><hr>
                    </div> 
                    <div class="col-md-12">
                        <select data-placeholder=" Catégories Post" multiple class="ar form-control chzn-select  chzn-rtl"
                                tabindex="10" name="listcateg[]" id="listcateg">
                            <?php foreach ($allcateg as $key => $categ){?>
                                <option class="ar" value="<?php echo $categ->id;?>" <?php if (in_array($categ->id, postdata($datapost)->categs)) { echo 'selected="selected"'; }?>> <?php echo categdata($categ)->title;?></option> 
                            <?php }?>
                        </select>  <hr>
                    </div>
                    <div class="col-md-12">
                        <input type="text" placeholder="Tags" id="tags"  name="tags" class="form-control" value="<?php echo postdata($datapost)->tag;?>">  
                    </div>
                    </div>
                </div>
                <div class="col-md-12"> </div>
                <br>
                <div class="col-md-12" style="padding:5%;"> 
                    <div class="col-md-8"></div> 
                    <div class="col-md-4">
                        <input type="submit" name="uppost" value="Update" class="btn btn-success">
                        <a href="<?php echo URL;?>/admin/delete/<?php echo $datapost->id;?>?model=Post&red=blog" class="btn btn-danger">Deleter</a>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

</div>
</form>