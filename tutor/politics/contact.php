<?php include('header.php') ?>
                <h1>Vote Crunchy for President</h1>
                <p>As famed food critic Florence Fabricant has said, "Peanut Butter is the pate of childhood". Make sure your children get only the best by voting
                for Crunchy Peanut Butter. Devoted to the cause of delicious PB sandwiches, Crunchy Peanut Butter has faithfully served the American people since 1932.
                Since stepping out into the market shelves, CPB has been introducing people to a Peanut Butter that has the rich flavor of Smooth Peanut Butter, but with
                an added interesting texture and is a more filling foodstuff. Despite our campaign's growing popularity, we still trail behind Smooth Peanut Butter. 
                CPB needs your help now more than ever. Please fill out the form below to voice your support and consider donating to our cause to help spread CPB's 
                platform! CPB thanks you!</p>
                
                <form action="process_contact.php" method="POST">
                    <div class="row">
                        <div class="question">
                            <input type="text" name="name" id="name">
                            <label for="name">*Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="question">
                            <input type="email" name="email" id="email">
                            <label for="email">*Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="question">
                            <select name="gender" id="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <label for="gender">*Gender</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="question">
                            <select name="age" id="age">
                                <option value="18-25">18-25</option>
                                <option value="26-35">26-35</option>
                                <option value="36-45">36-45</option>
                                <option value="46-55">46-55</option>
                                <option value="55+">55+</option>
                            </select>
                            <label for="age">*Age</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="question">
                            <label>Contribution Amount</label>
                            <div class="buttons">
                                <label for="50" class="hide_radio">
                                    <input type="radio" id="50" name="contribution" value="50">$50 
                                </label>
                                <label for="100" class="hide_radio">
                                    <input type="radio" id="100" name="contribution" value="100">$100
                                </label>
                                <label for="300" class="hide_radio">
                                    <input type="radio" id="300" name="contribution" value="300">$300
                                </label>
                                <label for="500" class="hide_radio">
                                    <input type="radio" id="500" name="contribution" value="500">$500
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="question">
                            <label for="interests">Interests (check all that apply):</label>	
                            <label class="check"><input type="checkbox" name="interests[1]" value="Strawberry Jam">Strawberry Jam</label>
                            <label class="check"><input type="checkbox" name="interests[2]" value="Grape Jelly">Grape Jelly</label>
                            <label class="check"><input type="checkbox" name="interests[3]" value="Blueberry Compote">Blueberry Compote</label>
                            <label class="check"><input type="checkbox" name="interests[4]" value="Apple Butter">Apple Butter</label>
                            <label class="check"><input type="checkbox" name="interests[5]" value="Marmalade">Marmalade</label>
                            <label class="check"><input type="checkbox" name="interests[6]" value="Bananas">Bananas</label>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="question"> 
                            <label for="comments">Comments:</label>
                            <textarea maxlength="500" placeholder="500 characters maximum" name="comments" id="comments"></textarea>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="question">
                            <label for="newsletter">Sign up for our newsletter?
                            <input type="checkbox" name="newsletter" id="newsletter"></label>
                        </div>
                    </div>

                    <div class="row">
                        <button>Submit</button>
                    </div>
                </form>
            </main>
        </div>
	</body>
</html>