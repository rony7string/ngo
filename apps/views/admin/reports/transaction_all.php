<div id="site">
  <div id="content_2_column">
    
    <div id="channel_full">
      <div id="manager_header">
        <h1 id="lblPageName">All Transaction</h1>
      </div>

      <?php $this->load->view('admin/reports/left'); ?>

      <div id="ManagerWorkArea">
        <div id="mgrFullChannel">
          <div>
            <table cellspacing="0" border="0" style="border-collapse: collapse;" id="GridViewTR" class="GridView">
              <tbody>
                <tr align="left" style="font-family: Arial; text-decoration: none;">
                  <th scope="col">&nbsp;</th>
                  <th scope="col">Trans #</th>
                  <th scope="col">User</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Item Qty.</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Date</th>
                </tr>
                <?php
                foreach ($transactions as $key => $value) {
                  ?>
                  <tr class="RowStyle">
                    <td>
                      <a href="transactions/delete/<?php echo $value['id']; ?>" title="Category Delete"><img src="assets/images/icon_delete.gif" border="0" /></a>
                    </td>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['user_name']; ?></td>
                    <td><?php echo $value['customer_name']; ?></td>
                    <td align="right"><?php echo number_format($value['item_qty']); ?> Pcs</td>
                    <td align="right"><?php echo number_format($value['amount'], 2); ?></td>
                    <td align="center"><?php echo $value['created']; ?></td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>