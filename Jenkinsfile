pipeline {
    agent any

    environment {
        SWR_REGION = "ap-southeast-1"
        SWR_DOMAIN = "swr.${SWR_REGION}.myhuaweicloud.com"
        SWR_NAMESPACE = "your-namespace"
        IMAGE_NAME = "php-simple-api"
        IMAGE_TAG = "latest"
        FULL_IMAGE = "${SWR_DOMAIN}/${SWR_NAMESPACE}/${IMAGE_NAME}:${IMAGE_TAG}"
        HUAWEI_CREDS = credentials('huawei-swr')
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main',
                    url: 'https://gitlab.com/your-user/php-simple-api.git'
            }
        }

        stage('Docker Login') {
            steps {
                sh """
                docker login ${SWR_DOMAIN} \
                  -u ${HUAWEI_CREDS_USR} \
                  -p ${HUAWEI_CREDS_PSW}
                """
            }
        }

        stage('Build Image') {
            steps {
                sh "docker build -t ${FULL_IMAGE} ."
            }
        }

        stage('Push Image') {
            steps {
                sh "docker push ${FULL_IMAGE}"
            }
        }
    }

    post {
        always {
            sh "docker logout ${SWR_DOMAIN}"
        }
    }
}
