<?php
	include 'head.php'
?>
		<h2><strong>Risk Assessment<strong></h2>
		<h4>Step 1: description of step 1</h4>
		<form class="form-horizontal" role="form" action="viewjsa.php">
			<table class="table table-striped table-hover table-bordered table-responsive table-condensed">
				<thead>
					<tr>
						<th rowspan="2">Hazard</th>
						<th rowspan="2">Risk</th>
						<th rowspan="2">Existing controls</th>
						<th colspan="3">Risk</th>
						<th rowspan="2">Control measures</th>
						<th rowspan="2">Action by</th>
						<th colspan="3">Residual Risk</th>
						<th rowspan="2"></th>
					</tr>
					<tr>
						<th>Severity</th>
						<th>Likelihood</th>
						<th>Risk Level</th>
						<th>Severity</th>
						<th>Likelihood</th>
						<th>Risk Level</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Hazard 1</td>
						<td>Risk 1</td>
						<td>Any controls</td>
						<td>3</td>
						<td>3</td>
						<td>Major</td>
						<td>Any controls</td>
						<td>Maintenance</td>
						<td>1</td>
						<td>1</td>
						<td>Minor</td>
					</tr>
					<tr>
						<td><input type="text" class="form-control" /></td>
						<td><input type="text" class="form-control" /></td>
						<td><input type="text" class="form-control" /></td>
						<td>
							<select>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</td>
						<td>
							<select>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</td>
						<td>Major</td>
						<td><input type="text" class="form-control" /></td>
						<td>
							<select>
								<option>Operation</option>
								<option>Technical</option>
								<option>Maintenance</option>
								<option>HSSE</option>
							</select>
						</td>
						<td>
							<select>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</td>
						<td>
							<select>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</td>
						<td>Minor</td>
					</tr>
					<tr>
						<td colspan="11"><button class="btn btn-default">Add more</button></td>
					</tr>	
				</tbody>
			</table>
			<button class="btn btn-default">Save</button>
		</form>
<?php
	include 'foot.php';
?>