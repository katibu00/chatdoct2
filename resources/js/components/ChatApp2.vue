<template>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                    <div class="card card-flush">
                        <div class="card-body pt-5" id="kt_chat_contacts_body">
                            <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="0px">
                                <div @click.prevent="selectUser(user.patient.id)" :class="{ 'active-user': userMessage.user && userMessage.user.id === user.patient.id }" class="d-flex flex-stack py-4" v-for="user in userList" :key="user.id">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px symbol-circle">
                                            <!-- Display the initial of the patient dynamically -->
                                            <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">{{ user.patient.first_name.charAt(0) }}</span>
                                        </div>                                        
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">{{ user.patient.first_name }} {{ user.patient.middle_name }} {{ user.patient.last_name }}</a>
                                            <div class="fw-bold text-muted">P{{ user.patient.number }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end ms-2">
                                        <!-- Display the dynamic timestamp instead of static "1 day" -->
                                        <span class="text-muted fs-7 mb-1">{{ user.created_at | moment("MMM D, YYYY") }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10" >
                    <div class="card" id="kt_chat_messenger">
                        <div class="card-header" id="kt_chat_messenger_header">
                            <div class="card-title">
                                <div class="d-flex justify-content-center flex-column me-3">
                                    <a v-if="userMessage.user" href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{userMessage.user.first_name}} {{userMessage.user.middle_name}} {{userMessage.user.last_name}}</a>
                                </div>
                            </div>
                            <a href="/doctor/patients" class="btn btn-icon btn-light-danger mt-2 btn-hover-primary">
                                <i class="bi bi-arrow-left"></i>
                            </a>
                        </div>
                        
                        <div class="card-body" id="kt_chat_messenger_body">
                            <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px" v-chat-scroll>
                                <div v-for="message in userMessage.messages" :key="message.id">
                                    <div class="d-flex justify-content-end mb-10" data-kt-element="template-out" v-if="message.user.id !== userMessage.user.id">
                                        <!-- Doctor's Messages -->
                                        <div class="d-flex flex-column align-items-end">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="me-3">
                                                    <span class="text-muted fs-7 mb-1">{{ message.created_at | moment("MMM D, h:mm a") }}</span>
                                                </div>
                                            </div>
                                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">{{ message.message }}</div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-start mb-10" data-kt-element="template-in" v-else>
                                        <!-- Patient's Messages -->
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="ms-3">
                                                    <span class="text-muted fs-7 mb-1">{{ message.created_at | moment("MMM D, h:mm a") }}</span>
                                                </div>
                                            </div>
                                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">{{ message.message }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                            <p v-if="typing">{{typing}} typing . . .</p>
                            <textarea v-if="userMessage.user" @keydown="typingEvent(userMessage.user.id)" @keydown.enter="sendMessage" v-model="message" class="form-control form-control-flush mb-3" rows="1" placeholder="Type a message" data-kt-element="input"></textarea>
                            <textarea v-else disabled class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
                            <div class="d-flex flex-stack">
                                <div class="d-flex align-items-center me-2">
                                    <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
                                        <i class="bi bi-paperclip fs-3"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
                                        <i class="bi bi-upload fs-3"></i>
                                    </button>
                                </div>
                                <button class="btn btn-primary" v-if="userMessage.user" @click="sendMessage" type="button" data-kt-element="send">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<!-- ... your existing script and style sections ... -->

<script>
import _ from 'lodash'
export default {

    mounted(){

         Echo.private(`chat.${authuser.id}`)
        .listen('NewChatMessage', (e) => {
            this.selectUser(e.message.from);
    });

        this.$store.dispatch('userList');

        Echo.private('typingEvent')
        .listenForWhisper('typing', (e) => {

            if(e.user.id==this.userMessage.user.id && e.userId == authuser.id){

                this.typing = e.user.name;
            }
            this.typing = e.user.name;
            setTimeout(() => {
                this.typing = '';
            }, 2000);
        })
    },

     data(){
         return{
             message: '',
             typing: '',
             users:[],
             online:''
         }
    },

    computed:{

        userList(){
            return  this.$store.getters.userList
        },
         userMessage(){
            return  this.$store.getters.userMessage
        },
        distanceFromNow() {
         return moment('2017-12-20 11:00').fromNow()
      }
    },

    created(){

        Echo.join('liveuser')
        .here((users) => {
            this.users = users
        })
        .joining((user) => {
             this.online = user
        })
        .leaving((user) => {
            //
        });

    },

    methods:{
        selectUser(userId){
            this.$store.dispatch('userMessage',userId);
        },
        goBackToBooking() {
            // Use Vue Router to go back to the previous page
            this.$router.go(-1);
        },
        sendMessage(e){
            e.preventDefault();
            if(this.message != ''){
                axios.post('/sendmessage',{message:this.message,user_id: this.userMessage.user.id})
                .then(response=>{
                    this.selectUser(this.userMessage.user.id);
                })
                this.message = ''
            }
        },

        typingEvent(userId){
          Echo.private('typingEvent')
          .whisper('typing', {
              'user': authuser,
              'typing': this.message,
              'userId': userId
          });
        },

        onlineUser(userId){
            return _.find(this.users,{'id':userId});
        }

    }
}
</script>

<style>
.active-user {
    background-color: #f8f9fa;
}
</style>
