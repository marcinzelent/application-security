#include <stdio.h>
#include <string.h>

int main(void)
{
	char buf[16];
	int ok = 0;

	printf("Type admin password: ");
	fgets(buf, sizeof buf, stdin);
	buf[strlen(buf)-1] = '\0';

	if (strcmp(buf, "pass123")) printf("\nWrong password!\n");
	else ok = 1;

	if (ok) printf("\nLogged in as admin.\n");

	return 0;
}
