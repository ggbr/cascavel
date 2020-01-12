# Cascavel

Application for monitoring server, use API netdata for get metrics 
and send alert message for Slack  with metrics of server Netdata in monitoring

## Services stack

- Laravel - web server for config of alert agent 
- Python agent - Send message of Netdata server  metrics for Slack
- MySQL - Save config of alert server
