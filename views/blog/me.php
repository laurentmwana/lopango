
<div class="ui sizer vertical segment">
  <div class="ui huge header">My lopango</div>
  <p></p>
</div>

<table class="ui compact celled definition table">
  <thead>
    <tr>
      <th></th>
      <th>Name</th>
      <th>Registration Date</th>
      <th>E-mail address</th>
      <th>Premium Plan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="collapsing">
        <div class="ui fitted slider checkbox">
          <input type="checkbox"> <label></label>
        </div>
      </td>
      <td>John Lilki</td>
      <td>September 14, 2013</td>
      <td>jhlilk22@yahoo.com</td>
      <td>No</td>
    </tr>
    <tr>
      <td class="collapsing">
        <div class="ui fitted slider checkbox">
          <input type="checkbox"> <label></label>
        </div>
      </td>
      <td>Jamie Harington</td>
      <td>January 11, 2014</td>
      <td>jamieharingonton@yahoo.com</td>
      <td>Yes</td>
    </tr>
    <tr>
      <td class="collapsing">
        <div class="ui fitted slider checkbox">
          <input type="checkbox"> <label></label>
        </div>
      </td>
      <td>Jill Lewis</td>
      <td>May 11, 2014</td>
      <td>jilsewris22@yahoo.com</td>
      <td>Yes</td>
    </tr>
  </tbody>
  <tfoot class="full-width">
    <tr>
      <th></th>
      <th colspan="4">
        <a href="<?= $router->GenerateUri('addme') ?>" class="ui tiny primary button"><i class="user icon"></i> Nouveau</a>
        <a href="" class="ui tiny red button"><i class="trash icon"></i> Supprimer</a>
        <a href="" class="ui tiny teal button"><i class="edit icon"></i> Modifier</a>
      </th>
    </tr>
  </tfoot>
</table>



<form class="ui form">
  <div class="field">
    <label>Empty</label>
    <input name="empty" type="text">
  </div>
  <div class="field">
    <label>Dropdown</label>
    <select class="ui dropdown" name="dropdown">
      <option value="">Select</option>
      <option value="male">Choice 1</option>
      <option value="female">Choice 2</option>
    </select>
  </div>
  <div class="inline field">
    <div class="ui checkbox">
      <input type="checkbox" name="checkbox">
      <label>Checkbox</label>
    </div>
  </div>
  <div class="ui submit button">Submit</div>
  <div class="ui error message"></div>
</form>