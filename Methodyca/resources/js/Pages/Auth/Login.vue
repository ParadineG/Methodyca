<template>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

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
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </inertia-link>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
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
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },
        inject: ['captchaKey'],
        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                id: '',
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false,
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
                            submit(form)
                        });
                    });
                }
            },
            submit(form) {
                form
                    .transform(data => ({
                        ... data,
                        remember: form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => form.reset('password'),
                    })
            }
        }
    }
</script>
