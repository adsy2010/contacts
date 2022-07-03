<script setup>
import ProfileForm from "./ProfileForm";
import PersonalInformationForm from "./PersonalInformationForm";
import NotificationPreferencesForm from "./NotificationPreferencesForm";
import Divider from "../../../Shared/Divider";
import {useForm} from "@inertiajs/inertia-vue3";

let props = defineProps({
    profile: Boolean,
    notificationPreferences: Boolean,
    personalInformation: Boolean,
    contact: Object,
    edit: Boolean,
});

let form = useForm({
    first_name: (props.contact) ? props.contact.first_name : '',
    last_name: (props.contact) ? props.contact.last_name : '',
    email: (props.contact) ? props.contact.email : '',
    date_of_birth: (props.contact) ? props.contact.date_of_birth_form : '',
});

let submit = () => {
    if(props.edit) {
        form.patch(`/contact/${props.contact.id}`, {
            replace: true,
            preserveScroll: true,
            preserveState: true,
        });
    } else {
        form.post(`/contact`, {
            replace: true,
            preserveScroll: true,
            preserveState: true,
        });
    }
}

</script>

<template>

    <!--Profile-->
    <ProfileForm v-if="profile" :form="form"/>

    <!-- divider -->
    <Divider v-if="profile && (personalInformation || notificationPreferences)"/>

    <!-- Personal Information -->
    <PersonalInformationForm
        v-if="personalInformation"
        :form="form"
        :edit="edit"
        first-name
        last-name
        email
        date-of-birth
        @submit="submit"
    />

    <!-- divider -->
    <Divider v-if="(profile || personalInformation) && notificationPreferences" />

    <!-- Notification preferences -->
    <NotificationPreferencesForm v-if="notificationPreferences" :form="form" />

</template>
