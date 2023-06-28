const {createApp} = Vue


const app = createApp({

    template: '#app-template',
    data() {
        return {
            mrShowModal1: false,
            mrShowModal2: false,
            mrUsers: '',
            mrMessage: '',
            mrId: '',

            mrNameInput: '',
            mrUsernameInput: '',
            mrEmailInput: '',
            mrStreetInput: '',
            mrCityInput: '',
            mrZipcodeInput: '',
            mrPhoneInput: '',
            mrCompanyInput: '',

            mrValidateFlag: '',
            mrValidateName: '',
            mrValidateUsername: '',
            mrValidateEmail: '',
            mrValidateStreet: '',
            mrValidateCity: '',
            mrValidateZipCode: '',
            mrValidatePhone: '',
            mrValidateCompany: ''


        }

    },


    mounted: function () {
        this.mrReadJson();
    },


    methods: {


        mrReadJson: function () {
            axios.post('./partials/readjson.php', {})

                .then(response => {

                    this.mrUsers = response.data.mrUsers;
                    this.mrMessage = response.data.mrMessage;

                })

                .catch(function (error) {

                });
        },


        mrClickButtonRemove: function (id) {
            this.mrShowModal1 = true;
            this.mrId = id;
            console.log(id)
        },

        mrClickButtonDelete: function () {
            axios.post('./partials/delete.php', {
                mrId: this.mrId,
            })

                .then(response => {
                    this.mrReadJson();
                    this.mrShowModal1 = false;

                })

                .catch(function (error) {

                });
        },


        mrClickButtonSubmit: function () {
            axios.post('./partials/submit.php', {
                mrNameInput: this.mrNameInput,
                mrUsernameInput: this.mrUsernameInput,
                mrEmailInput: this.mrEmailInput,
                mrStreetInput: this.mrStreetInput,
                mrCityInput: this.mrCityInput,
                mrZipcodeInput: this.mrZipcodeInput,
                mrPhoneInput: this.mrPhoneInput,
                mrCompanyInput: this.mrCompanyInput,
                mrUsers: this.mrUsers
            })

                .then(response => {
                    this.mrValidateFlag = response.data.mrValidateFlag;

                    if (this.mrValidateFlag == 1) {
                        this.mrValidateName = response.data.mrValidateName;
                        this.mrValidateUsername = response.data.mrValidateUsername;
                        this.mrValidateEmail = response.data.mrValidateEmail;
                        this.mrValidateStreet = response.data.mrValidateStreet;
                        this.mrValidateCity = response.data.mrValidateCity;
                        this.mrValidateZipCode = response.data.mrValidateZipCode;
                        this.mrValidatePhone = response.data.mrValidatePhone;
                        this.mrValidateCompany = response.data.mrValidateCompany;
                    } else {
                        this.mrReadJson();
                        this.mrShowModal2 = false;

                        // reset
                        this.mrReset();
                    }


                })

                .catch(function (error) {

                });
        },

        mrClickSubmitCancel: function () {
            // showmodal 2 close
            this.mrShowModal2=false;
            // reset
            this.mrReset();
        },

        mrReset: function () {
            // reset
            this.mrValidateName = '';
            this.mrValidateUsername = '';
            this.mrValidateEmail = '';
            this.mrValidateStreet = '';
            this.mrValidateCity = '';
            this.mrValidateZipCode = '';
            this.mrValidatePhone = '';
            this.mrValidateCompany = '';

            this.mrNameInput = '';
            this.mrUsernameInput = '';
            this.mrEmailInput = '';
            this.mrStreetInput = '';
            this.mrCityInput = '';
            this.mrZipcodeInput = '';
            this.mrPhoneInput = '';
            this.mrCompanyInput = '';
        }

    }
})

app.mount('#app')
