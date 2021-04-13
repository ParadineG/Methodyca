<template>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="captcha(captchaKey, submit, id, form)">
            <div class="hp">
                <jet-label for="id" value="id" />
                <jet-input id="id" type="text" v-model="id"/>
            </div>
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Confirm Password" />
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reset Password
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>
<style scoped>
    .hp {
        display: none;
	}
</style>
<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors
        },
        inject: ['captchaKey'],
        props: {
            email: String,
            token: String,
        },

        data() {
            return {
                id: '',
                form: this.$inertia.form({
                    token: this.token,
                    email: this.email,
                    password: '',
                    password_confirmation: '',
                    token2: '',
                })
            }
        },

        methods: {
            captcha: (captchaKey, submit, id, form) => {
                if (!id) {
                    grecaptcha.ready(function() {
                        grecaptcha.execute(captchaKey, {action: 'submit'}).then(function(token) {
                            // Add your logic to submit to your backend server here.
                            form.token2 = token
                            submit(form);
                        });
                    });
                }
            },
            submit(form) {
                form.post(this.route('password.update'), {
                    onFinish: () => form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
