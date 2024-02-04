<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SiteLayout from '@/Layouts/SiteLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    genders: {
        type: Array,
    },
    user_gender: {
        type: Number,
    },
    user_name: {
      type: String,
    },
    user_id: {
      type: String,
    },
    home_route: {
      type: String,
    },
    user_route: {
      type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <SiteLayout :user_name="user_name" :home_route="home_route" :user_route="user_route">
        <div class="py-12 mx-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-gray-300 shadow rounded-md">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        :genders="genders"
                        :user_gender="user_gender"
                        class="max-w-xl"
                    />
                </div>

                <div class="p-4 sm:p-8 bg-gray-300 shadow rounded-md">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="p-4 sm:p-8 bg-gray-300 shadow rounded-md">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </SiteLayout>
</template>
