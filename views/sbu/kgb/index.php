<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02.05.2020
 * Time: 20:13
 */

?>
<style>
@import "compass/css3";

.table-editable {
    position: relative;

    .glyphicon {
        font-size: 20px;
  }
}

.table-remove {
    color: #700;
    cursor: pointer;

    &:hover {
        color: #f00;
    }
}

.table-up, .table-down {
    color: #007;
    cursor: pointer;

    &:hover {
        color: #00f;
    }
}

.table-add {
    color: #070;
    cursor: pointer;
    position: absolute;
    top: 8px;
  right: 0;

  &:hover {
        color: #0b0;
    }
}
</style>


<div class="container">
  <h1>HTML5 Editable Table</h1>
  <p>Through the powers of <strong>contenteditable</strong> and some simple jQuery you can easily create a custom editable table. No need for a robust JavaScript library anymore these days.</p>

  <ul>
    <li>An editable table that exports a hash array. Dynamically compiles rows from headers</li>
    <li>Simple / powerful features such as add row, remove row, move row up/down.</li>
  </ul>

  <div id="table" class="table-editable">
    <span class="table-add glyphicon glyphicon-plus"></span>
    <table class="table">
      <tr>
        <th>Name</th>
        <th>Value</th>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <td contenteditable="true">Stir Fry</td>
        <td contenteditable="true">stir-fry</td>
        <td>
          <span class="table-remove glyphicon glyphicon-remove"></span>
        </td>
        <td>
          <span class="table-up glyphicon glyphicon-arrow-up"></span>
          <span class="table-down glyphicon glyphicon-arrow-down"></span>
        </td>
      </tr>
      <!-- This is our clonable table line -->
      <tr class="hide">
        <td contenteditable="true">Untitled</td>
        <td contenteditable="true">undefined</td>
        <td>
          <span class="table-remove glyphicon glyphicon-remove"></span>
        </td>
        <td>
          <span class="table-up glyphicon glyphicon-arrow-up"></span>
          <span class="table-down glyphicon glyphicon-arrow-down"></span>
        </td>
      </tr>
    </table>
  </div>

  <button id="export-btn" class="btn btn-primary">Export Data</button>
  <p id="export"></p>
</div>

