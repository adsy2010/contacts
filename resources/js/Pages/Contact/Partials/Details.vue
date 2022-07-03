<script setup>
import {TrashIcon} from '@heroicons/vue/outline';
import {useForm} from '@inertiajs/inertia-vue3'
import PersonalInformation from "./PersonalInformation";
import NotificationPreferences from "./NotificationPreferences";
import Profile from "./Profile";
import Divider from "../../Shared/Divider";

let emit = defineEmits([]);
let props = defineProps({
    personalInformation: Boolean,
    notificationPreferences: Boolean,
    profile: Boolean,
    contact: Object
});

let deleteContact = () => {
    let form = useForm({});
    form.delete(`/contact/${props.contact.id}`);
}

</script>

<template>
    <div>
        <Profile v-if="profile" :contact="contact"></Profile>

        <!-- divider -->
        <Divider v-if="profile && (personalInformation || notificationPreferences)"/>

        <PersonalInformation v-if="personalInformation" :contact="contact"></PersonalInformation>

        <!-- divider -->
        <Divider v-if="(profile || personalInformation) && notificationPreferences" />

        <NotificationPreferences v-if="notificationPreferences" :contact="contact"></NotificationPreferences>

        <!-- Delete contact -->
        <div class="my-6 flex justify-end pr-2 xl:pr-0">
            <button
                @click="deleteContact"
                class="flex items-center bg-red-600 rounded-md text-white hover:bg-red-800 px-3 py-2">
                <TrashIcon class="h-5 w-5"/><span class="pl-2"> Delete Contact</span>
            </button>
        </div>
    </div>
</template>
