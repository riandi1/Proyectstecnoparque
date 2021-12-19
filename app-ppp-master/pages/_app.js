import Layout from '../components/Layout/Layout'
import '../styles/App.scss'
import {useEffect} from 'react'
import {useRouter} from 'next/router'


function MyApp({ Component, pageProps }) {
  const router = useRouter()



  useEffect(() => {
    if(!sessionStorage.getItem('sessionPPP') && router.pathname !== '/login' && router.pathname !== '/newUser'){
      router.push('/login')
      return
    }
  })
  
  return (
    <Layout>
    <Component {...pageProps} />
    </Layout>
  )
}

export default MyApp
