<?php include('header.php'); ?>
                <form action="process_tuition.php" method="POST" class="container-fluid">
                    <fieldset>
                        <legend>Tuition Costs</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="resident">*Are you a California state resident?</label>
                                <select name="resident" id="resident" class="form-control" required>
                                    <option value="" selected disabled> Select One</option>
                                    <option value="46">Yes</option>
                                    <option value="331">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="units">*Number of Units</label>
                                <select name="units" id="units" class="form-control" required>
                                    <option value="" selected disabled> Select One</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                </select>
                            </div>
                        </div>
                        <p>There is a mandatory Student Health fee of $20.</p>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Optional Costs</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="services">College Services Card:</label>
                                <select name="services" class="form-control" id="services">
                                    <option value="0" selected>No</option>
                                    <option value="20">Yes [$20]</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="parking">Parking Permit:</label>
                                <select name="parking" class="form-control" id="parking">
                                    <option value="0" selected>No</option>
                                    <option value="30">Yes [$30]</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </main>
        </div>
	</body>
</html>