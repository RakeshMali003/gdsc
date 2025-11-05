pipeline {
    agent any

    stages {

        stage('Checkout') {
            steps {
                echo "🔄 Checking out the latest code from GitHub..."
                git branch: 'main', url: 'https://github.com/RakeshMali003/gdsc.git'
            }
        }

        stage('Prepare deploy dir') {
            steps {
                echo "🧹 Cleaning old deployment directory and creating new one..."
                bat '''
                if exist "C:\\xampp\\htdocs\\gdsc" (
                    rmdir /S /Q "C:\\xampp\\htdocs\\gdsc"
                )
                mkdir "C:\\xampp\\htdocs\\gdsc"
                '''
            }
        }

        stage('Copy files to webserver') {
            steps {
                echo "📦 Copying project files to XAMPP htdocs..."
                bat '''
                robocopy "C:\\ProgramData\\Jenkins\\.jenkins\\workspace\\gdsc_main" "C:\\xampp\\htdocs\\gdsc" /MIR /XD .git node_modules
                if %ERRORLEVEL% LEQ 7 (
                    exit 0
                ) else (
                    exit /b %ERRORLEVEL%
                )
                '''
            }
        }

        stage('Verify Deployment') {
            steps {
                echo "🔍 Verifying if project deployed to XAMPP directory..."
                bat '''
                if exist "C:\\xampp\\htdocs\\gdsc\\index.php" (
                    echo ✅ PHP Project successfully deployed to XAMPP.
                ) else (
                    echo ❌ Deployment failed! index.php not found.
                    exit /b 1
                )
                '''
            }
        }
    }

    post {
        success {
            echo "✅ Build and Deployment Successful! Visit: http://localhost/gdsc"
        }
        failure {
            echo "❌ Build Failed! Check Jenkins console output for errors."
        }
        always {
            echo "📋 Jenkins job completed at %DATE% %TIME%"
        }
    }
}
