
<script>
export default {
    emits: ['switch-list'],
    props: ['service_id', 'classeur_id', 'create_classeur', 'hideDocBtn'],
    methods: {
        addClasseur() {
            this.$inertia.post(`/classeurs`, {
                service_id: this.service_id,
            }, {
                onSuccess: () => {
                    this.$emit('switch-list', true)
                }
            })
        },
        onChange(e) {
            this.file = e.target.files[0];
            this.$inertia.post(
                `/documents`,
                {
                    service_id: this.service_id,
                    classeur_id: this.classeur_id,
                    file: this.file,
                }, {
                    onSuccess: () => {
                        this.$emit('switch-list', false)
                    }
                }
            );
            
        },
    }
}
</script>

<template>
    <div class="d-flex">
        <button
            class="btn btn-primary btn-sm d-flex align-items-center"
            type="button"
            style="margin-right: 10px; height: 30.33px"
            @click="addClasseur()"
            v-if="!create_classeur"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
                width="1em"
                height="1em"
                fill="currentColor"
            >
                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                <path
                    d="M512 416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H192c20.1 0 39.1 9.5 51.2 25.6l19.2 25.6c6 8.1 15.5 12.8 25.6 12.8H448c35.3 0 64 28.7 64 64V416zM232 376c0 13.3 10.7 24 24 24s24-10.7 24-24V312h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H280V200c0-13.3-10.7-24-24-24s-24 10.7-24 24v64H168c-13.3 0-24 10.7-24 24s10.7 24 24 24h64v64z"
                ></path></svg
            ><span class="d-none d-md-block" style="margin-left: 6px"
                >Classeur</span
            ></button
        ><label class="form-label" for="file" style="margin-bottom: 0px"
            ><a
                class="btn btn-primary btn-sm d-flex align-items-center"
                role="button"
                style="height: 30.33px"
                v-if="hideDocBtn"
                ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 -32 576 576"
                    width="1em"
                    height="1em"
                    fill="currentColor"
                >
                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm16 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v48H368c-8.8 0-16 7.2-16 16s7.2 16 16 16h48v48c0 8.8 7.2 16 16 16s16-7.2 16-16V384h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H448V304z"
                    ></path></svg
                ><span class="d-none d-md-block" style="margin-left: 6px"
                    >Document</span
                ></a
            ></label
        ><input 
            id="file" 
            class="d-none" 
            type="file"
            @change="onChange" />
    </div>
</template>
