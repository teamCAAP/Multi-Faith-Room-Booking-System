pipeline {
  agent any
  stages {
    stage('Composer install') {
      steps {
        echo 'Composer install'
        sh 'composer install'
      }
    }
    stage('Finished') {
      steps {
        echo 'Finished'
      }
    }
  }
}