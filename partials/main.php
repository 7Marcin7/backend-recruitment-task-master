<?php

// Please add your logic here

echo "<h1 class='starting-title'>Nice to see you! &#128075;</h1>";

?>

<div id="app">
    <app-template></app-template>
</div>

<template id="app-template">
    <div>
        <!--add table-->
        <h3>{{mrMessage}}</h3>
        <div style="height: 340px; overflow: auto;">
            <table id="customers">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Action</th>
                </tr>
                <!--read mrUsers-->
                <tr v-for="mrUser in mrUsers">
                    <td>{{mrUser.id}}</td>
                    <td>{{mrUser.name}}</td>
                    <td>{{mrUser.username}}</td>
                    <td>{{mrUser.email}}</td>
                    <td>
                        {{mrUser.address.street}}, {{mrUser.address.zipcode}} {{mrUser.address.city}}
                    </td>
                    <td>{{mrUser.phone}}</td>
                    <td>{{mrUser.company.name}}</td>
                    <td>
                        <button class="mr-button-remove" @click="mrClickButtonRemove(mrUser.id)">Remove</button>
                    </td>
                </tr>
            </table>
        </div>
        <button @click="mrShowModal2=true" class="mr-button-submit">Submit</button>
        <!-- end table-->

        <!-- modal1-->
        <div v-if="mrShowModal1" class="modal">
            <span @click="mrShowModal1=false" class="close" title="Close Modal">×</span>
            <form class="modal-content" action="/action_page.php">
                <div class="container">
                    <h1>Delete User</h1>
                    <p>Are you sure you want to delete your account ID = {{mrId}} ?</p>

                    <div class="clearfix">
                        <button @click="mrShowModal1=false" type="button" class="cancelbtn">Cancel</button>
                        <button @click="mrClickButtonDelete" type="button" class="deletebtn">Delete</button>
                    </div>
                </div>
            </form>
        </div>
        <!--modal1 end-->


        <!-- modal2-->
        <div v-if="mrShowModal2" class="modal">
            <span @click="mrShowModal2=false" class="close" title="Close Modal">×</span>
            <form class="modal-content" action="/action_page.php">
                <div class="container">
                    <h1>Submit User</h1>
                    <section>
                        <div class="mr-form-submit-row">
                            <div>
                                <p>Name:*</p>
                                <input maxlength="50" v-model="mrNameInput" placeholder="name"/>
                                <div class="mrValidate">{{mrValidateName}}</div>
                            </div>

                            <div>
                                <p>Username:*</p>
                                <input maxlength="50" v-model="mrUsernameInput" placeholder="username"/>
                                <div class="mrValidate">{{mrValidateUsername}}</div>
                            </div>
                        </div>

                        <div class="mr-form-submit-row">
                            <div>
                                <p>Email:*</p>
                                <input maxlength="50" v-model="mrEmailInput" placeholder="email"/>
                                <div class="mrValidate">{{mrValidateEmail}}</div>
                            </div>
                            <div>
                                <p>Street:*</p>
                                <input maxlength="50" v-model="mrStreetInput" placeholder="street"/>
                                <div class="mrValidate">{{mrValidateStreet}}</div>
                            </div>
                        </div>
                        <div class="mr-form-submit-row">
                            <div>
                                <p>City:*</p>
                                <input maxlength="50" v-model="mrCityInput" placeholder="city"/>
                                <div class="mrValidate">{{mrValidateCity}}</div>
                            </div>
                            <div>
                                <p>Zip Code:*</p>
                                <input maxlength="50" v-model="mrZipcodeInput" placeholder="zip code"/>
                                <div class="mrValidate">{{mrValidateZipCode}}</div>
                            </div>
                        </div>
                        <div class="mr-form-submit-row">
                            <div>
                                <p>Phone:*</p>
                                <input maxlength="50" v-model="mrPhoneInput" placeholder="phone"/>
                                <div class="mrValidate">{{mrValidatePhone}}</div>
                            </div>
                            <div>
                                <p>Company:*</p>
                                <input maxlength="50" v-model="mrCompanyInput" placeholder="company"/>
                                <div class="mrValidate">{{mrValidateCompany}}</div>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix">
                        <button @click="mrClickSubmitCancel" type="button" class="cancelbtn">Cancel</button>
                        <button @click="mrClickButtonSubmit" type="button" class="submitbtn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <!--modal2 end-->
    </div>
</template>


