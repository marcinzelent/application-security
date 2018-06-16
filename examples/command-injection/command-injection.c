#include <stdlib.h>
#include <string.h>

int main(int argc, char **argv)
{
	char cmd[strlen(argv[1]) + 6];
	strcpy(cmd, "echo ");
	strcat(cmd, argv[1]);
	system(cmd);

	return 0;
}
