// Fetch data from PHP backend
fetch(url)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // If fetching specific team
            if (team !== 'all') {
                populateTeamGrid(`${team}TeamGrid`, data.data);
            } else {
                // Populate all team grids
                if (data.data.leaders && data.data.leaders.length > 0) {
                    populateTeamGrid('leadersTeamGrid', data.data.leaders);
                }
                if (data.data.executive && data.data.executive.length > 0) {
                    populateTeamGrid('executiveTeamGrid', data.data.executive);
                }
                if (data.data.web && data.data.web.length > 0) {
                    populateTeamGrid('webDevTeamGrid', data.data.web);
                }
                if (data.data.design && data.data.design.length > 0) {
                    populateTeamGrid('designTeamGrid', data.data.design);
                }
                if (data.data.operations && data.data.operations.length > 0) {
                    populateTeamGrid('operationsTeamGrid', data.data.operations);
                }
                if (data.data.marketing && data.data.marketing.length > 0) {
                    populateTeamGrid('marketingTeamGrid', data.data.marketing);
                }
                if (data.data.technical && data.data.technical.length > 0) {
                    populateTeamGrid('technicalTeamGrid', data.data.technical);
                }
                if (data.data.outreach && data.data.outreach.length > 0) {
                    populateTeamGrid('outreachTeamGrid', data.data.outreach);
                }
                if (data.data.media && data.data.media.length > 0) {
                    populateTeamGrid('mediaTeamGrid', data.data.media);
                }
            }
        } else {
            console.error('Error fetching team data:', data.message);
        }
    })
    .catch(error => {
        console.error('Error fetching team data:', error);
    });