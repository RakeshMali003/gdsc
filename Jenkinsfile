pipeline {
  agent any

  environment {
    // Use double backslashes or forward slashes
    DEPLOY_DIR = "C:/xampp/htdocs/gdsc"
    REPO_URL = 'https://github.com/RakeshMali003/gdsc.git'
    BRANCH = 'main'
  }

  stages {
    stage('Checkout') {
      steps {
        git branch: "${BRANCH}", url: "${REPO_URL}"
      }
    }

    stage('Prepare deploy dir') {
      steps {
        bat """
        if exist "${DEPLOY_DIR}" (
          rmdir /S /Q "${DEPLOY_DIR}"
        )
        mkdir "${DEPLOY_DIR}"
        """
      }
    }

    stage('Copy files to webserver') {
      steps {
        bat """
        robocopy "%WORKSPACE%" "${DEPLOY_DIR}" /MIR /XD .git
        """
      }
    }

    stage('Notify') {
      steps {
        echo "✅ Deployment done to ${DEPLOY_DIR}"
      }
    }
  }

  post {
    success {
      echo "🎉 Build and Deployment successful!"
    }
    failure {
      echo "❌ Build failed! Check console output."
    }
  }
}
