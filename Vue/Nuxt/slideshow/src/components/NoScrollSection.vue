<template>
    <div class="container">
        <div class="row">
            <div ref="scrollSection" @scroll="handleScroll" class="no-scroll-field">
                <div
                v-for="(text, index) in texts"
                :key="index"
                ref="text"
                :class="(index === compareKey)?'': 'active'"
                >
                    {{ text.title }}
                </div>
            </div>
        </div>
        <router-link :to="{name: 'Slideshow'}">Slide Show</router-link>
    </div>
</template>

<script>
// import json for this
import scrollJson from '@/jsons/scroll.json'

export default {
    name: 'NoScrollSection',
    data () {
        return {
            texts: null,
            compareKey: 0
            // compareTops: null
        }
    },
    created () {
        window.addEventListener('scroll', this.handleScroll)
    },
    destroyed () {
        window.removeEventListener('scroll', this.handleScroll)
    },
    mounted () {
        this.texts = scrollJson.json
    },
    methods: {
        handleScroll: function (event) {
            // let compareData = []
            // this.$refs.text.forEach(area => {
            //     compareData.push(area.offsetTop)
            // })
            // this.compareTops = compareData
            let scrollY = this.$refs.scrollSection.scrollTop
            console.log('scrollY', scrollY)
            // let comHeigth = this.$refs.scrollSection.clientHeight
            this.$refs.text.forEach((area, i) => {
                if (area.offsetTop <= scrollY) {
                    this.compareKey = i
                }
            })
        }
    }
}
</script>
