<?php $this->load->view('header');?>
<div class="col-sm-1 col-md-10">
<?php if($results->num_rows() > 0) { ?>
    <table class="table table-hover  width="100%">
<thead>
<th scope="col">No</th>
<th scope="col">Name</th>
<th scope="col">Price</th>
<th scope="col">Writer</th>
<th scope="col">publication</th>
<th scope="col">Details</th>
</thead>
    <?php $i=1;
     foreach($results->result() as $row){ ?>
    <tbody>
 <th scope="row"><?php echo $i++; ?></th>
 <td><?php echo $row->bookname; ?></td>
<td><?php echo $row->price; ?>TK</td>
<td><?php echo $row->author_name; ?></td>
<td><?php echo $row->publication; ?></td>
<td><a  href='<?php echo site_url('Mainindex/showall/'.$row->id)?>'> More</a></td>

    </tbody>
<?php }} else { ?>
<h3 class="text-center h2">No books found</h3>
<div class="text-center bg-secendary">  <?php echo anchor('Mainindex','Back Home');?>
<img class="card-img-top" src="<?php echo base_url();?>assets/images/nodatafound.jpg" height=300px;></a>
<?php } ?>
</table>
</div>

<?php $this->load->view('footer');?>