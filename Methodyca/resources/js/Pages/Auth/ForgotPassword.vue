<template>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit(captchaKey, submit, id, form)">
            <div class="hp">
                <jet-label for="id" value="id" />
                <jet-input id="id" type="text" v-model="id"/>
            </div>
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
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
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            captcha: (captchaKey, submit, id, form) => {
                if (!id) {
                    grecaptcha.ready(function() {
                        grecaptcha.execute(captchaKey, {action: 'submit'}).then(function(token) {
                            // Add your logic to submit to your backend server here.
                            submit(form);
                        });
                    });
                }
            },
            submit(form) {
                form.post(this.route('password.email'))
            }
        }
    }
</script>
