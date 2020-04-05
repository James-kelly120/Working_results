import Slideshow from '@/components/Slideshow'
import NoScrollSection from '@/components/NoScrollSection'

export default [
    {
        path: '/slideshow',
        name: 'Slideshow',
        component: Slideshow
    },
    {
        path: '/noScrollSection',
        name: 'NoScrollSection',
        component: NoScrollSection
    },
    {
        path: '/*',
        redirect: '/slideshow'
    }
]
